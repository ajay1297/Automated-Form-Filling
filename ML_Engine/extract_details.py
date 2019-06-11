import re
import nltk
import json
from nltk.corpus import stopwords
stop = stopwords.words('english')

#os.system("tesseract img1 text1")
#os.system("tesseract img2 text2")

file1 = open('text1.txt','r')
file2 = open('text2.txt','r')


string1 = file1.read()
string2 = file2.read()

def classify(document):
	r=re.compile(r'[sS][.]?[\s]*[sS][.]?[\s]*[lL][.]?[\s]*[cC]')
	doc=r.findall(document)
	if(doc):
		return 10
	r=re.compile(r'10[\s]*[tT][\s]*[hH]')
	doc=r.findall(document)
	if(doc):
		return 10
	r=re.compile(r'SECONDARY[\s]*SCHOOL')
	doc=r.findall(document)
	if(doc):
		return 10
	r=re.compile(r'[pP][uU]')
	doc=r.findall(document)
	if(doc):
		return 12
	r=re.compile(r'[pP][rR][eE][^a-zA-z]*[Uu][nN][iI]')
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

doc_10=0
doc_12=0
def doc_classify(str1,str2):
	if(classify(str1)==10):
		global doc_10
		doc_10=str1
	elif(classify(str1)==12):
		global doc_12
		doc_12=str1

	if(classify(str2)==10):
		doc_10
		doc_10=str2
	elif(classify(str2)==12):
		doc_12
		doc_10=str2

def extract_tot(document):
	r=re.compile(r'[\s]*\s[2-6][0-9][0-9]\s')
	marks=r.findall(document)
	for i in range(len(marks)):
		marks[i]=re.sub(r'[^0-9]',' ',marks[i])
	marks=list(map(int,marks))
	marks.sort()
	if(len(marks)>1):
		if(marks[len(marks)-1]<600):
			ret=marks[len(marks)-1]
		elif(marks[len(marks)-1]<625):
			ret=marks[len(marks)-1]
		else:
			ret=marks[len(marks)-2]
	else:
		ret=marks[0]
	return ret

def extract_mom(document):
	r=re.compile(r"Mother.*Name[^a-zA-Z]*[A-Z\s]*[a-z]?")
	mother=r.findall(document)[0]
	mother=re.sub(r"Mother.*Name[^A-Z]*",'',mother)
	mother=re.sub(r'[\s][\s].*','',mother)
	mother=re.sub(r'[A-Z][a-z]','',mother)
	mother=re.sub(r'[\s]*[^A-Z]*[\s]*','',mother)
	return mother

def extract_dad(document):
	r=re.compile(r"Father.*Name[^a-zA-Z]*[A-Z\s]*[a-z]?")
	father=r.findall(document)[0]
	father=re.sub(r"Father.*Name[^A-Z]*",'',father)
	father=re.sub(r'[\s][\s].*','',father)
	father=re.sub(r'[A-Z][a-z]','',father)
	father=re.sub(r'[\s]*[^A-Z]+[\s]*',' ',father)
	return father

def dob(document):
	r=re.compile(r'[0-2][0-9][\.\-\\/][0-1][0-9][\.\-\\/][0-2][0-9][0-9][0-9]')
	db=r.findall(document)
	db.sort()
	return db[0]

string=string1 + string2

doc_classify(string1+string2)

total_10=extract_tot(doc_10)
total_12=extract_tot(doc_12)
mom=extract_mom(string)
dad=extract_dad(string)
db=dob(string)

ret=[]
ret.append(total_10)
ret.append(total_12)
ret.append(mom)
ret.append(dad)
ret.append(db)

retu=json_dumps(ret)

def result():
	return retu

result()
