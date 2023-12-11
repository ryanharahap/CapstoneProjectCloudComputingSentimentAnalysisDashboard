FROM python:3.11-slim

WORKDIR /app

COPY . /app

RUN pip install -r requirements.txt

COPY .env .env

EXPOSE 8080

CMD exec gunicorn --bind 8080 app:app