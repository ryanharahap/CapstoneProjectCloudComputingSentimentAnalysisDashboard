from fastapi import FastAPI
from fastapi.middleware.cors import CORSMiddleware

# Routes
from .prediction import router as predict_router

app = FastAPI()

origins = ["*"]

app.add_middleware(
  CORSMiddleware,
  allow_origins=origins,
  allow_methods=["*"],
  allow_headers=["*"]
)

app.include_router(predict_router.router)

@app.get('/')
def check_status():
  return {
    "status": "Healthy"
  }