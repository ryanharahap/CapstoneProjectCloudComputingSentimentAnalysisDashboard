from fastapi import APIRouter
from .services import PredictionService
from pydantic import BaseModel
from .schemas import InputBase

router = APIRouter(
  prefix="/predict",
  tags=["predict"]
)

@router.post("/")
async def predict(data: InputBase):
  return PredictionService().predict(data)