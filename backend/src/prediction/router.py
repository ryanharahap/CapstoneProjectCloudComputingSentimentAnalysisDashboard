from typing import List
from fastapi import APIRouter
from .services import PredictionService
from .schemas import YoutubeRequest, PlaystoreRequest, NewsRequest

router = APIRouter(
  prefix="/predict",
  tags=["predict"]
)

@router.post("/playstore")
async def playstore_prediction(data: List[PlaystoreRequest]):
  return PredictionService().playstore_predict(data)

@router.post("/youtube")
async def youtube_prediction(data: List[YoutubeRequest]):
  return PredictionService().youtube_predict(data)

@router.post("/news")
async def news_prediction(data: List[NewsRequest]):
  return PredictionService().news_predict(data)