# Demo konverzní mikroslužby

Demo objektového navrhu mikroslužby která dokáže načítat data z různých zdrojů
a konvertovat do několika ruzných odpovědí.

### Nastavení
Zdroje se nastavují v __/etc/settings.ini__ v sekci __feeds__
- **nazevFeedu[url]** - url zdroje
- **nazevFeedu[type]** - nazev readeru - třída reader/nazevReader

### Čtení dat
je potřeba zavolat url v nasledujícím formátu
**http://server/nazevFeedu/nazevReaderu**

### Poznamka
Pro produkční prostředi by bylo třeba doplnit cachování.