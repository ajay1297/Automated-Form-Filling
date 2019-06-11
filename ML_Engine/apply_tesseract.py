import re
import os
import nltk
from nltk.corpus import stopwords
stop = stopwords.words('english')

os.system("tesseract uploads/img1.jpg text1")
os.system("tesseract uploads/img2.jpg text2")