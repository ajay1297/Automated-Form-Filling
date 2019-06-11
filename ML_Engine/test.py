import re
import nltk
import json
import sys
from nltk.corpus import stopwords
stop = stopwords.words('english')

#os.system("tesseract img1 text1")
#os.system("tesseract img2 text2")

file1 = open('text1.txt','r',encoding="utf8")
file2 = open('text2.txt','r',encoding="utf8")

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

doc_10=''
doc_12=''
if(classify(string1)==10):
	doc_10=string1
	doc_12=string2
else:
	doc_12=string1
	doc_10=string2

def extract_tot(document):
	r=re.compile(r'[\s]*\s[2-6][0-9][0-9]\s')
	marks=r.findall(document)
	r=re.compile(r'[\s]*[5-9][.][0-9]*[\s]*|[\s]*10[\s]*|[\s]*10[.]0[\s]*')
	marks2=r.findall(document)
	if(len(marks)>0):
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
	elif(len(marks2)>0):
		for i in range(len(marks2)):
			marks2[i]=re.sub(r'[^0-9]','',marks2[i])
		marks2=list(map(int,marks2))
		marks2.sort()
		for i in marks2:
			if(i>10):
				marks2.remove(i)
		if(marks2[len(marks2)-1]==10 and marks2[len(marks2)-1]==10):
			ret=marks2[len(marks2)-1]
		else:
			ret=marks2[len(marks2)]
		return ret
	else:
		return 0

def extract_mom(document):
	r=re.compile(r"Mother.*Name[^a-zA-Z]*[A-Z\s]*[a-z]?")
	mother=r.findall(document)
	l=len(mother)
	if(l>0):
		mother=mother[0]
		mother=re.sub(r"Mother.*Name[^A-Z]*",'',mother)
		mother=re.sub(r'[\s][\s].*','',mother)
		mother=re.sub(r'[A-Z][a-z]','',mother)
		mother=re.sub(r'[\s]*[^A-Z]*[\s]*','',mother)
		return mother
	else:
		return " "

def extract_dad(document):
	r=re.compile(r"Father.*Name[^a-zA-Z]*[A-Z\s]*[a-z]?")
	father=r.findall(document)
	l=len(father)
	if(l>0):
		father=father[0]
		father=re.sub(r"Father.*Name[^A-Z]*",'',father)
		father=re.sub(r'[\s][\s].*','',father)
		father=re.sub(r'[A-Z][a-z]','',father)
		father=re.sub(r'[\s]*[^A-Z]+[\s]*',' ',father)
		return father
	else:
		return " "

def dob(document):
	r=re.compile(r'[0-2][0-9][\.\-\\/][0-1][0-9][\.\-\\/][0-2][0-9][0-9][0-9]')
	db=r.findall(document)
	l=len(db)
	if(l>0):
		db.sort()
		return db[0]
	else:
		return 0

def max_marks(document):
	r=re.compile(r'[\s]*\s[2-6][0-9][0-9]\s')
	marks=r.findall(document)
	marks=list(map(int,marks))
	for i in marks:
		if(i%25!=0):
			marks.remove(i)
	if(len(marks)>0):
		return max(marks)
	else:
		return 10

def board(document):
	r=re.compile(r'[cC][.][bB][.][sS][.][eE]')
	boa=r.findall(document)
	if(boa):
		return 'C.B.S.E'
	r=re.compile(r'[Cc][eE][nN][Tt][rR][aA][lL][\s]*[bB][oO][aA][rR][dD]')
	boa=r.findall(document)
	if(boa):
		return 'C.B.S.E'
	r=re.compile(r'[iI][.][cS][.][sS][.][eE]')
	boa=r.findall(document)
	if(boa):
		return 'I.C.S.E'
	r=re.compile(r'[iI][nN][dD][iI][aA][nN][\s]*[cC][eE][rR][tT][iI][fF][iI][cC][aA][tT][eE]')
	boa=r.findall(document)
	if(boa):
		return 'I.C.S.E'
	return 'State'
	
	

string=string1+string2

total_10=extract_tot(doc_10)
max_10=max_marks(doc_10)
total_12=extract_tot(doc_12)
max_12=max_marks(doc_12)
mom=extract_mom(string)
dad=extract_dad(string)
db=dob(string)
board_10=board(doc_10)
if(total_10<=10 and board_10!='State'):
	board_10='C.B.S.E'
board_12=board(doc_12)
if(total_12<=10 and board_12!='State'):
	board_12='C.B.S.E'
if(board_10=='State' and max_10%25!=0):
	max_10==625

'''ret=[]
ret.append(dad)
ret.append(mom)
ret.append(db)
ret.append(board_10)
ret.append(board_12)
if(board_10=='State' and max_10%25!=0):
	ret.append(625)
else:
	ret.append(max_10)
ret.append(total_10)
if(board_12=='State' and max_12%25!=0):
	ret.append(600)
else:
	ret.append(max_12)
ret.append(total_12)'''

name = "";
for i in range(1,len(sys.argv)):
	name = name + sys.argv[i] + " ";

ret = {}
ret["name"] = name
ret["fathersName"] = dad
ret["mothersName"] = mom
ret["dob"] = str(db)
ret["board10"] = str(board_10)
ret["board12"] = str(board_12)
if(board_10=='State' and max_10%25!=0):
	ret["tenthMax"] = "625"
else:
	ret["tenthMax"] = str(max_10)
#ret["tenthMax"] = "625"
ret["tenthTotal"] = str(total_10)
if(board_12=='State' and max_12%25!=0):
	ret["twelvethMax"] = "600"
else:
	ret["twelvethMax"] = str(max_12)
#ret["twelvethMax"] = "600"
ret["twelvethTotal"] = str(total_12)


import json
with open('data.json', 'w') as outfile:
    json.dump(ret, outfile)