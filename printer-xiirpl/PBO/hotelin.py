def garis():
    print("=========================")

garis()
#input 
nama = input("Masukkan Nama Anda : ")
tipe_kamar = input("Pilih Tipe Kamar : ")
lama_inap = int(input("Berapa Lama Anda Menginap : "))
garis()

#kalkulasi
if tipe_kamar == "superior":
    if lama_inap <= 2:
        harga_kamar = 100000*lama_inap
    elif lama_inap <= 4:
        harga_kamar = 90000*lama_inap
    elif lama_inap >= 5:
        harga_kamar = 80000*lama_inap

elif tipe_kamar == "deluxe":
    if lama_inap <= 2:
        harga_kamar = 150000*lama_inap
    elif lama_inap <= 4:
        harga_kamar = 135000*lama_inap
    elif lama_inap >= 5:
        harga_kamar = 120000*lama_inap

elif tipe_kamar == "premium":
    if lama_inap <= 2:
        harga_kamar = 200000*lama_inap
    elif lama_inap <= 4:
        harga_kamar = 180000*lama_inap
    elif lama_inap >= 5:
        harga_kamar = 160000*lama_inap

print ("Nama Anda :" , nama)
print ("Kamar Yang Anda Pilih :" , tipe_kamar)
print ("Lama Menginap :" , lama_inap , "Hari")
print ("Total Harga Yang Dibayar : Rp.", harga_kamar)
garis()