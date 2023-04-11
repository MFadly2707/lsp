# SORT BUBBLE MUHAMMAD FADLY EKA ARDIANSYAH
def garis():
        print ("========================================")

garis()
print ("Masukan Lima Buah Nilai")
a = int(input("Nilai A : "))
b = int(input("Nilai B : "))
c = int(input("Nilai C : "))
d = int(input("Nilai D : "))
e = int(input("Nilai E : "))

nilai = [a,b,c,d,e,]
total = a+b+c+d+e
asc = sorted(nilai)
dsc = sorted(nilai, reverse=True)
max = max(nilai)
min = min(nilai)
sum = total / len(nilai)

garis()
print ('Urutan Nilai Ascending  :', asc)
print ('Urutan Nilai Descending :', dsc)
print ('Nilai MAX :', max)
print ('Nilai MIN :', min)
print ('Nilai RATA RATA :', sum)
garis()