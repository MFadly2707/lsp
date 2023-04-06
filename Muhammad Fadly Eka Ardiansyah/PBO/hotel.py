def garis():
    print("                      ")
    print("===== Pembayaran =====")

def intro():
    print("Program Menginap Di Hotel")
    print(" __________ _______________ _______________ _______________ ")
    print("|          |    Superior   |     Deluxe    |     Premium   |")
    print("|__________|_______________|_______________|_______________|")
    print("| 1-2 Hari | 110.000/night | 160.000/night | 210.000/night |")
    print("| 3-4 Hari | 95.000/night  | 145.000/night | 190.000/night |")
    print("| > 5 Hari | 85.000/night  | 130.000/night | 170.000/night |")
    print("|__________|_______________|_______________|_______________|")
    print("                                                            ")

def kamar():
    print("          ")
    print("Tipe Kamar")
    print("1.Superior")
    print("2.Deluxe")
    print("3.Premium")


def tipe_kamar():
    if pilih_kamar == "1":
        print("Tipe Kamar : Superior")
    elif pilih_kamar == "2":
        print("Tipe Kamar : Deluxe")
    elif pilih_kamar == "3":
        print("Tipe Kamar : Premium")
jalan = True
while (jalan == True) :

intro()
nama = input("Masukkan Nama : ")
kamar()
pilih_kamar = input("Pilih Tipe Kamar : ")
lama_inap = int(input("Lama Menginap : "))

if pilih_kamar == "1":
    if lama_inap <= 2:
        harga_kamar = 100000*lama_inap
    elif lama_inap <= 4:
        harga_kamar = 90000*lama_inap
    elif lama_inap >= 5:
        harga_kamar = 80000*lama_inap
    harga_penginapan = harga_kamar / lama_inap

elif pilih_kamar == "2":
    if lama_inap <= 2:
        harga_kamar = 150000*lama_inap
    elif lama_inap <= 4:
        harga_kamar = 135000*lama_inap
    elif lama_inap >= 5:
        harga_kamar = 120000*lama_inap
    harga_penginapan = harga_kamar / lama_inap

elif pilih_kamar == "3":
    if lama_inap <= 2:
        harga_kamar = 200000*lama_inap
    elif lama_inap <= 4:
        harga_kamar = 180000*lama_inap
    elif lama_inap >= 5:
        harga_kamar = 160000*lama_inap
    harga_penginapan = harga_kamar / lama_inap

garis()
print ("Nama Anda :" , nama)
print ("Harga Penginapan : Rp.", harga_penginapan)
tipe_kamar()
print ("Lama Menginap :" , lama_inap , "Hari")
print ("Total Pembayaran : Rp.", harga_kamar)
i = input("Ingin Memesan Lagi ? (y/n)")
if (i == 'n') :
    jalan = False