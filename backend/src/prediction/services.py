from typing import List
from .schemas import PlaystoreRequest, YoutubeRequest, NewsRequest
import os
from keras.models import load_model
from keras.preprocessing.text import Tokenizer
from keras.preprocessing.sequence import pad_sequences
import pickle

current_directory = os.path.dirname(os.path.realpath(__file__))
playstore_model_path = os.path.join(current_directory, 'ml-model', 'model_playstore_v2.h5')
youtube_model_path = os.path.join(current_directory, 'ml-model', 'model_youtube_v1.h5')
news_model_path = os.path.join(current_directory, 'ml-model', 'model_news_v2.h5')

# Load the model from the .pkl file
# with open(news_model_path, 'rb') as file:
#     loaded_model = pickle.load(file)

MAX_LENGTH = 200

class PredictionService:
  def __init__(self):
    self.playstore_model = load_model(playstore_model_path, compile=False)
    self.youtube_model = load_model(youtube_model_path, compile=False)
    self.news_model = load_model(news_model_path, compile=False)
    self.tokenizer = Tokenizer()
  
  def playstore_predict(self, data: List[PlaystoreRequest]):
    predicitions = []
    
    for datum in data:
      # Convert to a sequence
      sequences = self.tokenizer.texts_to_sequences(datum.review)
      # Pad the sequence
      padded = pad_sequences(sequences, padding='post', maxlen=MAX_LENGTH)
      predictions = self.playstore_model.predict(padded)
      if predictions[0] >= 0.5:
        sentiment = "Positive"
      else:
        sentiment = "Negative"

      predictions.append({
        "user": datum.user,
        "review": datum.review,
        "score": datum.score,
        "thumbs_up_count": datum.thumbs_up_count,
        "submitted_at": datum.submitted_at,
        "sentiment": sentiment
      })
    return {
      'status': 'success',
      'predictions': predicitions
    }
  
  def youtube_predict(self, data: List[YoutubeRequest]):
    predicitions = []
    
    for datum in data:
      # Convert to a sequence
      sequences = self.tokenizer.texts_to_sequences(datum.comment)
      # Pad the sequence
      padded = pad_sequences(sequences, padding='post', maxlen=MAX_LENGTH)
      predictions = self.youtube_model.predict(padded)
      if predictions[0] >= 0.5:
        sentiment = "Positive"
      else:
        sentiment = "Negative"

      predictions.append({
        "author": datum.author,
        "published_at": datum.published_at,
        "updated_at": datum.updated_at,
        "like_count": datum.like_count,
        "comment": datum.comment,
        "sentiment": sentiment
      })
    return {
      'status': 'success',
      'predictions': predicitions
    }
  
  def news_predict(self, data: List[NewsRequest]):
    predicitions = []
    
    for datum in data:
      # Convert to a sequence
      sequences = self.tokenizer.texts_to_sequences(datum.title)
      # Pad the sequence
      padded = pad_sequences(sequences, padding='post', maxlen=MAX_LENGTH)
      predictions = self.news_model.predict(padded)
      if predictions[0] >= 0.5:
        sentiment = "Positive"
      else:
        sentiment = "Negative"

      predictions.append({
        "title": datum.title,
        "source": datum.source,
        "link": datum.link,
        "published_date": datum.published_at,
        "sentiment": datum.sentiment
      })
    return {
      'status': 'success',
      'predictions': predicitions
    }
