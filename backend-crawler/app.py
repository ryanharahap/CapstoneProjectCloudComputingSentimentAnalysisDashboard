from flask import Flask, request, jsonify
from flask_cors import CORS, cross_origin
from news import News
from playstore import Playstore
from youtube import Youtube

app = Flask(__name__)
CORS(app, origins="*")

news = News()
playstore = Playstore()
youtube = Youtube()

@app.route("/crawl/youtube", methods=["POST"])
@cross_origin()
def crawl_youtube():
  video_id = request.json["video_id"]
  result = youtube.crawl(video_id)
  return jsonify(
    video_id=video_id,
    result=result
  )

@app.route("/crawl/playstore", methods=["POST"])
@cross_origin()
def crawl_playstore():
  package_name = request.json["package_name"]
  result = playstore.crawl(package_name)
  return jsonify(
    package_name=package_name,
    result=result
  )

@app.route("/crawl/news", methods=["POST"])
@cross_origin()
def crawl_news():
  news_url = request.json["news_url"]
  result = news.crawl(news_url)
  return jsonify(
    news_url=news_url,
    result=result
  )

@app.route("/")
@cross_origin()
def status():
  return "Hello World"