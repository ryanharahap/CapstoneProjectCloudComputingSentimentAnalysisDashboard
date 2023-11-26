from typing import List
from pydantic import BaseModel

class InputBase(BaseModel):
  sentence: str

class InputList(BaseModel):
  items: List[InputBase]