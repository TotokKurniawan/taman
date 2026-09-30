from flask import Flask, request, jsonify
import pandas as pd
import numpy as np
import os
import joblib
import warnings
from sklearn.exceptions import InconsistentVersionWarning
from sklearn.preprocessing import LabelEncoder
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score

warnings.filterwarnings("ignore", category=InconsistentVersionWarning)

MODEL_PATH = 'rekomendasi_rf_model.joblib'
ENCODER_PATH = 'rekomendasi_labelencoders.joblib'
TARGET_ENCODER_PATH = 'rekomendasi_targetencoder.joblib'
DATASET_PATH = 'dataset/data1.csv'

app = Flask(__name__)

model = None
le_dict = None
target_encoder = None
df = None

fitur_cols = [
    "Intensitas Cahaya (Kategori)",
    "Intensitas Air (Kategori)",
    "Cara Penyiraman (Frekuensi)",
    "Konsep Utama Taman",
    "Ukuran Taman yang Cocok (Kategori)",
    "Lokasi Penanaman (Indoor/Outdoor)"
]

target_col = "Tipe Utama Tanaman"
nama_tanaman_col = "Nama Tanaman"

def load_model_data():
    global model, le_dict, target_encoder, df
    model = joblib.load(MODEL_PATH)
    le_dict = joblib.load(ENCODER_PATH)
    target_encoder = joblib.load(TARGET_ENCODER_PATH)
    df = pd.read_csv(DATASET_PATH, sep=';')
    for col in df.columns:
        df[col] = df[col].astype(str).str.strip()
    print("Model dan dataset berhasil dimuat ke memory.")

try:
    load_model_data()
except Exception as e:
    print(f"Gagal memuat model awal: {e}")

@app.route('/retrain', methods=['POST'])
def retrain_model():
    global model, le_dict, target_encoder, df
    try:
        if 'file' not in request.files:
            return jsonify({"success": False, "error": "File CSV tidak ditemukan."}), 400
        file = request.files['file']
        if file.filename == '':
            return jsonify({"success": False, "error": "File CSV kosong."}), 400
        
        os.makedirs('dataset', exist_ok=True)
        
        try:
            new_data = pd.read_csv(file, sep=';')
        except Exception as e:
            return jsonify({"success": False, "error": f"Gagal membaca file CSV: {str(e)}"}), 400
        
        for col in new_data.columns:
            new_data[col] = new_data[col].astype(str).str.strip()
            
        print("Dataset baru diterima.")
        print(f"Jumlah data baru: {len(new_data)}")
        
        # Sertakan nama_tanaman_col ke dalam kolom yang wajib ada
        required_columns = fitur_cols + [target_col, nama_tanaman_col]
        missing_columns = [col for col in required_columns if col not in new_data.columns]
        
        if missing_columns:
            return jsonify({"success": False, "error": "Kolom dataset tidak lengkap.", "kolom_hilang": missing_columns}), 400
            
        new_data = new_data[required_columns].copy()
        new_data = new_data.dropna(subset=required_columns).copy()
        
        if len(new_data) < 1:
            return jsonify({"success": False, "error": "Dataset baru tidak memiliki data yang valid."}), 400
            
        if os.path.exists(DATASET_PATH):
            try:
                old_data = pd.read_csv(DATASET_PATH, sep=';')
                for col in old_data.columns:
                    old_data[col] = old_data[col].astype(str).str.strip()
                    
                missing_old_columns = [col for col in required_columns if col not in old_data.columns]
                if missing_old_columns:
                    return jsonify({"success": False, "error": "Dataset lama tidak memiliki kolom yang diperlukan.", "kolom_hilang": missing_old_columns}), 500
                    
                old_data = old_data[required_columns].copy()
                print(f"Jumlah data lama: {len(old_data)}")
            except Exception as e:
                return jsonify({"success": False, "error": f"Gagal membaca dataset lama: {str(e)}"}), 500
        else:
            old_data = pd.DataFrame(columns=required_columns)
            print("Dataset lama tidak ditemukan.")
            
        combined_df = pd.concat([old_data, new_data], ignore_index=True)
        before_duplicate = len(combined_df)
        combined_df = combined_df.drop_duplicates(subset=required_columns, keep='first').reset_index(drop=True)
        after_duplicate = len(combined_df)
        duplicate_count = before_duplicate - after_duplicate
        
        if len(combined_df) < 2:
            return jsonify({"success": False, "error": "Dataset minimal harus memiliki 2 data."}), 400
            
        training_df = combined_df.copy()
        X = training_df[fitur_cols].copy()
        y = training_df[target_col].copy()
        
        new_le_dict = {}
        for col in fitur_cols:
            le = LabelEncoder()
            X[col] = le.fit_transform(X[col].astype(str))
            new_le_dict[col] = le
            
        new_target_encoder = LabelEncoder()
        y_encoded = new_target_encoder.fit_transform(y.astype(str))
        jumlah_tipe = len(new_target_encoder.classes_)
        
        class_counts = pd.Series(y_encoded).value_counts()
        can_stratify = len(y_encoded) >= 10 and class_counts.min() >= 2 and int(np.ceil(len(y_encoded) * 0.2)) >= jumlah_tipe
        
        if can_stratify:
            X_train, X_test, y_train, y_test = train_test_split(X, y_encoded, test_size=0.2, random_state=42, stratify=y_encoded)
            mode_training = "training_testing"
        else:
            X_train = X
            y_train = y_encoded
            X_test = pd.DataFrame()
            y_test = np.array([])
            mode_training = "seluruh_data"
            
        new_model = RandomForestClassifier(n_estimators=100, max_depth=10, min_samples_split=2, random_state=42)
        new_model.fit(X_train, y_train)
        
        accuracy_percent = None
        if mode_training == "training_testing":
            y_pred = new_model.predict(X_test)
            accuracy = accuracy_score(y_test, y_pred)
            accuracy_percent = round(accuracy * 100, 2)
            
        model_path_temp = MODEL_PATH + '.tmp'
        encoder_path_temp = ENCODER_PATH + '.tmp'
        target_encoder_path_temp = TARGET_ENCODER_PATH + '.tmp'
        dataset_path_temp = DATASET_PATH + '.tmp'
        
        joblib.dump(new_model, model_path_temp)
        joblib.dump(new_le_dict, encoder_path_temp)
        joblib.dump(new_target_encoder, target_encoder_path_temp)
        training_df.to_csv(dataset_path_temp, sep=';', index=False)
        
        os.replace(model_path_temp, MODEL_PATH)
        os.replace(encoder_path_temp, ENCODER_PATH)
        os.replace(target_encoder_path_temp, TARGET_ENCODER_PATH)
        
        try:
            os.replace(dataset_path_temp, DATASET_PATH)
        except PermissionError:
            if os.path.exists(dataset_path_temp):
                try:
                    os.remove(dataset_path_temp)
                except Exception:
                    pass
            return jsonify({"success": False, "error": f"Dataset berhasil diproses, tetapi {DATASET_PATH} tidak dapat diganti karena sedang digunakan."}), 500
            
        model = new_model
        le_dict = new_le_dict
        target_encoder = new_target_encoder
        df = training_df
        
        return jsonify({
            "success": True,
            "message": "Dataset lama + baru berhasil digabung dan model berhasil dilatih ulang.",
            "data_lama": int(len(old_data)),
            "data_baru": int(len(new_data)),
            "data_duplikat": int(duplicate_count),
            "total_data": int(len(training_df)),
            "data_training": int(len(X_train)),
            "data_testing": int(len(X_test)),
            "jumlah_tipe": int(jumlah_tipe),
            "akurasi": accuracy_percent,
            "mode_training": mode_training
        }), 200

    except Exception as e:
        return jsonify({"success": False, "error": str(e)}), 500

@app.route('/predict', methods=['POST'])
def predict():
    global model, le_dict, target_encoder, df
    if model is None:
        return jsonify({"error": "Model belum tersedia."}), 500
        
    data = request.get_json(silent=True)
    if not data:
        return jsonify({"error": "Format request harus berupa JSON."}), 400
        
    input_user_text = {}
    for col in fitur_cols:
        value = data.get(col, "")
        input_user_text[col] = str(value).strip()
        
    for col in fitur_cols:
        if input_user_text[col] == "":
            return jsonify({"error": f"Input untuk '{col}' tidak boleh kosong."}), 400
        if input_user_text[col] not in le_dict[col].classes_:
            return jsonify({"error": f"Input '{input_user_text[col]}' untuk '{col}' tidak valid.", "pilihan": list(le_dict[col].classes_)}), 400
            
    input_encoded = {}
    try:
        for col in fitur_cols:
            input_encoded[col] = le_dict[col].transform([input_user_text[col]])[0]
    except Exception as e:
        return jsonify({"error": f"Gagal encoding: {str(e)}"}), 400
        
    input_df = pd.DataFrame([input_encoded])
    try:
        proba = model.predict_proba(input_df)[0]
    except Exception as e:
        return jsonify({"error": f"Gagal prediksi model: {str(e)}"}), 500
        
    jumlah_rekomendasi = min(3, len(proba))
    top3_index = proba.argsort()[-jumlah_rekomendasi:][::-1]
    
    top_types = []
    for idx in top3_index:
        tipe = target_encoder.inverse_transform([idx])[0]
        persen = round(float(proba[idx]) * 100, 2)
        top_types.append({"nama": tipe, "persen": persen})
        
    rekomendasi = []
    for tipe_info in top_types:
        tipe = tipe_info["nama"]
        tanaman_df = df[df[target_col] == tipe].copy()
        skor = []
        for _, row in tanaman_df.iterrows():
            cocok = sum(1 for col in fitur_cols if row[col] == input_user_text[col])
            skor.append(cocok)
        tanaman_df["Skor"] = skor
        tanaman_df = tanaman_df.sort_values(by="Skor", ascending=False)
        top5 = tanaman_df.head(5)
        
        daftar_tanaman = []
        for _, row in top5.iterrows():
            daftar_tanaman.append({"nama": row[nama_tanaman_col], "skor": int(row["Skor"])})
            
        rekomendasi.append({"tipe": tipe, "persen": tipe_info["persen"], "tanaman": daftar_tanaman})
        
    return jsonify({"rekomendasi": rekomendasi})

if __name__ == '__main__':
    port = int(os.environ.get("PORT", 5000))
    app.run(host='0.0.0.0', port=port)