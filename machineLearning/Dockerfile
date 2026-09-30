# Menggunakan base image Python
FROM python:3.9

# Menentukan direktori kerja di dalam container
WORKDIR /app

# Menyalin seluruh file dari komputer ke container
COPY . /app

# Menginstal library yang dibutuhkan dari requirements.txt
RUN pip install --no-cache-dir -r requirements.txt

# Port default yang digunakan Hugging Face Spaces adalah 7860
EXPOSE 7860

# Menjalankan aplikasi Flask menggunakan Gunicorn pada port 7860
CMD ["gunicorn", "-w", "4", "-b", "0.0.0.0:7860", "app:app"]