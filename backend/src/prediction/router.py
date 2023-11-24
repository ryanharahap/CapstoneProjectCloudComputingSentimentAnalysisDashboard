from fastapi import APIRouter
from .services import PredictionService

router = APIRouter(
  prefix="/predict",
  tags=["predict"]
)

@router.post("/")
async def predict():
  return PredictionService().predict()