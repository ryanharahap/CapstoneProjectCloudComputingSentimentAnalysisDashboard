from .schemas import InputBase
import os
from keras.models import load_model

current_directory = os.path.dirname(os.path.realpath(__file__))
model_path = os.path.join(current_directory, 'ml-model', 'model_playstore.h5')

class PredictionService:
  def __init__(self):
    self.model = load_model(model_path, compile=False)
  
  def predict(self, data: InputBase):
    # predictions = self.model.predict(data.sentence)
    # print(predictions)
    return {
      'status': 'success',
      'input': data.sentence,
      'prediction': 'Negative'
    }
