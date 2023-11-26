from fastapi import APIRouter
from .services import PredictionService
from pydantic import BaseModel
from .schemas import InputBase

router = APIRouter(
  prefix="/predict",
  tags=["predict"]
)

@router.post("/playstore")
async def predict(data: InputBase):
  return PredictionService().playstore_predict(data)

@router.post("/youtube")
async def predict(data: InputBase):
  return PredictionService().youtube_predict(data)

@router.post("/news")
async def predict(data: InputBase):
  return PredictionService().news_predict(data)