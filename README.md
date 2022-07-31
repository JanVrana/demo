## README Translation
- [English](README.md)
- [Czech](README.cz.md)

# Demo of conversion microservice

Demo of an object-based microservice design that can read data from different sources and convert it into several different responses.

### Settings

Sources are set in /etc/settings.ini in the feeds section

- **feedName[url]** - feed url
- **feedName[type]** - name of the reader - class reader/nameReader

### Reading data

you need to call the url in the following format 
**http://server/feedName/readerName**

### Note
Caching would need to be added for production environments.

### Running an application in Docker
in the root of the application to run the commands:

```bash 
    docker build -t vrana-demo:latest .
    docker run -d -p 3001:80 vrana-demo:latest
```

After running, the application is available at:
http://localhost:3001/


*Translated with www.DeepL.com/Translator (free version)*