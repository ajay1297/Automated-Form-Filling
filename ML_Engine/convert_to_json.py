import json
a = {'a':1,'b':2,'c':3}
with open("test.json", "w") as fp:
    json.dump(a , fp) 