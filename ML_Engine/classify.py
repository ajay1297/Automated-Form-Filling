import re
import os
import nltk
from nltk.corpus import stopwords
stop = stopwords.words('english')

#os.system("tesseract uploads/img1.jpg text1")
#os.system("tesseract uploads/img2.jpg text2")

file1 = open('text1.txt','r',encoding="utf8")
file2 = open('text2.txt','r',encoding="utf8")

string1 = file1.read()
string2 = file2.read()

#Student = input('')
#Student = Student.upper()

def classify(document):
	r=re.compile(r'[sS][.]?[\s]*[sS][.]?[\s]*[lL][.]?[\s]*[cC]')
	doc=r.findall(document)
	if(doc):
		return 10
	r=re.compile(r'10[\s]*[tT][\s]*[hH]')
	doc=r.findall(document)
	if(doc):
		return 10
	r=re.compile(r'SECONDARY[\s]*')
	doc=r.findall(document)
	if(doc):
		return 10
	r=re.compile(r'[pP][uU]')
	doc=r.findall(document)
	if(doc):
		return 12
	r=re.compile(r'[pP][rR][eE][^a-zA-Z]*[Uu][nN][iI]')
	doc=r.findall(document)
	if(doc):
		return 12
	r=re.compile(r'12[\s]*[tT][\s]*[hH]')
	doc=r.findall(document)
	if(doc):
		return 12
	r=re.compile(r'SENIOR[\s]*SCHOOL')
	doc=r.findall(document)
	if(doc):
		return 12
	return 0

doc_10=''
doc_12=''
if(classify(string1)==10):
	doc_10=string1
elif(classify(string1)==12):
	doc_12=string1

if(classify(string2)==10):
	doc_10=string2
elif(classify(string2)==12):
	doc_12=string2

def doc_classify():
	if(doc_10=='' and doc_12==''):
		return 1012
	elif(doc_10==''):
		return 10
	elif(doc_12==''):
		return 12
	else:
		return 0

a=doc_classify()

print(a)






