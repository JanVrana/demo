# Demo of conversion microservice

Demo of an object-based microservice design that can read data from different sources and convert it into several different responses.

### Settings

Sources are set in /etc/settings.ini in the feeds section

- **feedName[url]** - feed url
- **feedName[type]** - name of the reader - class reader/nameReader

### Reading data

you need to call the url in the following format 
**http://server/nazevFeedu/nazevReaderu**

### Note
Caching would need to be added for production environments.
README.cz.mdTranslated with www.DeepL.com/Translator (free version)