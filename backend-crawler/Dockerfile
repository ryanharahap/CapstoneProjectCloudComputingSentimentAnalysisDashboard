FROM python:3.11-slim

WORKDIR /app

COPY . /app

RUN pip install --no-cache-dir -r requirements.txt

COPY .env .env

EXPOSE 8000

CMD ["gunicorn", "app:app"]