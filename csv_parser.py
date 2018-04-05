import csv
import operator

with open('diabetes.csv') as csvfile:
    readCSV = csv.reader(csvfile, delimiter=',')
    header = next(readCSV)
    data = []

i = 0
for row in readCSV:
#    preg	plas	pres	skin	insu	mass	pedi	age	class
    data[i].preg = row[0]
    data[i].plas = row[1]
    data[i].pres = row[2]
    data[i].skin = row[3]
    data[i].insu = row[4]
    data[i].mass = row[5]
    data[i].pedi = row[6]
    data[i].age = row[7]
    data[i]._class = row[8]

    print(data[i])
    data++
