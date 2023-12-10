from fastapi import APIRouter
from .services import PredictionService
from .schemas import InputList, InputBase

router = APIRouter(
  prefix="/predict",
  tags=["predict"]
)

@router.post("/playstore")
async def playstore_prediction(data: InputBase):
  return PredictionService().playstore_predict(data)

@router.post("/youtube")
async def youtube_prediction(data: InputBase):
  return PredictionService().youtube_predict(data)

@router.post("/news")
async def news_prediction(data: InputBase):
  return PredictionService().news_predict(data)