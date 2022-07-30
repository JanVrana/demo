# Demo konverzní mikroslužby

Demo objektového navrhu mikroslužby která dokáže naèítat data z rùzných zdrojù.

### Nastavení
Zdroje se nastavují v __/etc/settings.ini__ v sekci __feeds__
- **nazevFeedu[url]** - url zdroje
- **nazevFeedu[type]** - nazev readeru - tøída reader/nazevReader

### Ètení dat
je potøeba zavolat url v nasledujícím formátu
**http://server/nazevFeedu/nazevReaderu**

### Poznamka
Pro produkèní prostøedi by bylo tøeba doplnit cachování.