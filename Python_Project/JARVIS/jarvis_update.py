import pyttsx3 #pip install pyttsx3
import speech_recognition as sr # pip install speechRecognition
import datetime
import wikipedia #pip insstall wikipedia
import webbrowser
import os
import smtplib


print("Memulai Jarvis")

BOS = "Nazhim"
engine = pyttsx3.init('sapi5')
voices = engine.getProperty('voices')
engine.setProperty('voice', voices[0].id)

# Function untuk bicara akan membaca string atau tulisan yang dikasih
def speak(text):
    engine.say(text)
    engine.runAndWait()

# Fungsi ini mengidentifikasi waktu dan menyapa
def wishMe():
    hour = int(datetime.datetime.now().hour)

    if hour >= 0 and hour < 12:
        speak("Good morning " + BOS)
    
    elif hour >= 12 and hour < 18:
        speak("Good Afternoon" + BOS)
    
    else:
        speak("Good Evening" + BOS)

    # speak("I am Jarvis. How could I Help You?")

# Program utama ada di sini (dari mik)
def takeCommand():
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Mendengarkan...")
        audio = r.listen(source)

    try:
        print("Recognizing...")
        query = r.recognize_google(audio, language='en-US')
        print(f"user said: {query}\n")

    except Exception as e:
        print("Say that again please")
        query = None
    
    return query

def sendEmail(to, content):
    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.ehlo()
    server.starttls()
    server.login('youremail@gmail.com', 'password')
    server.sendmail("nazhimmaulana@code.com", to, content)
    server.close()

def main():
    # speak("Initializing Jarvis...")
    wishMe()
    query = takeCommand()

    # Logika Eksekusi Tugas sederhana
    if 'wikipedia' in query.lower():
        speak("Searching wikipedia...")
        query = query.replace("wikipedia", "")
        results = wikipedia.summary(query, sentences = 2)
        print(results)
        speak(results)

    elif 'open youtube' in query.lower():
        # webbrowser.open("youtube.com")
        url = "youtube.com"
        chrome_path = 'C:/Program Files (x86)/Google/Chrome/Application/chrome.exe %s'
        webbrowser.get(chrome_path).open(url)

    elif 'open google' in query.lower():
        # webbrowser.open("youtube.com")
        url = "google.com"
        chrome_path = 'C:/Program Files (x86)/Google/Chrome/Application/chrome.exe %s'
        webbrowser.get(chrome_path).open(url)

    elif 'open facebook' in query.lower():
        # webbrowser.open("youtube.com")
        url = "facebook.com"
        chrome_path = 'C:/Program Files (x86)/Google/Chrome/Application/chrome.exe %s'
        webbrowser.get(chrome_path).open(url)

    elif 'play music' in query.lower():
        songs_dir = ("C:\\Users\\ASUS\\Music\\Anime")
        songs = os.listdir(songs_dir)
        print(songs)
        os.startfile(os.path.join(songs_dir, songs[0]))

    elif 'the time' in query.lower():
        strTime = datetime.datetime.now().strftime("%H:%M:%S")
        speak(f"{BOS} it is {strTime}")

    elif 'open code' in query.lower():
        codePath = "C:\\Users\\ASUS\\AppData\\Local\\Programs\\Microsoft VS Code\\Code.exe"
        os.startfile(codePath)

    elif 'email to harry' in query.lower():
        try:
            speak("What should I do")
            content = takeCommand()
            to = "nazhimmaulanamuhammad@gmail.com"
            sendEmail(to, content)
            speak("Email has been sent")

        except Exception as e:
            print(e)

main()