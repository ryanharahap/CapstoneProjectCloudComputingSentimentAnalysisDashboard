from .schemas import InputBase
import os
from keras.models import load_model

current_directory = os.path.dirname(os.path.realpath(__file__))
playstore_model_path = os.path.join(current_directory, 'ml-model', 'model_playstore.h5')
youtube_model_path = os.path.join(current_directory, 'ml-model', 'Youtube_Model.h5')
news_model_path = os.path.join(current_directory, 'ml-model', 'NewsHeadline_Model.pkl')

class PredictionService:
  def __init__(self):
    self.playstore_model = load_model(playstore_model_path, compile=False)
    self.youtube_model = load_model(youtube_model_path, compile=False)
    self.news_model = load_model(news_model_path, compile=False)
  
  def playstore_predict(self, data: InputBase):
    # predictions = self.playstore_model.predict(data.sentence)
    # print(predictions)
    return {
      'status': 'success',
      'input': data.sentence,
      'prediction': 'Negative'
    }
  
  def youtube_predict(self, data: InputBase):
    # predictions = self.youtube_model.predict(data.sentence)
    # print(predictions)
    return {
      'status': 'success',
      'input': data.sentence,
      'prediction': 'Negative'
    }
  
  def news_predict(self, data: InputBase):
    # predictions = self.news_model.predict(data.sentence)
    # print(predictions)
    return {
      'status': 'success',
      'input': data.sentence,
      'prediction': 'Negative'
    }
