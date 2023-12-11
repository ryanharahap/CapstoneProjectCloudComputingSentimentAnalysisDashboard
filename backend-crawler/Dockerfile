FROM python:3.11-slim

ENV PYTHONBUFFERED True

WORKDIR /app

COPY . /app

RUN pip install -r requirements.txt

COPY .env .env

CMD exec gunicorn --bind $PORT app:app