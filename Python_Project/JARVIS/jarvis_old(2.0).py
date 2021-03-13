import pyttsx3
import datetime


engine = pyttsx3.init()

def speak(audio):
    engine.say(audio)
    engine.runAndWait()


def getvoices(voice): # Ini bisa mengatur apakah mau pakai suara cowok atau cewek
    voices = engine.getProperty('voices')
    # print(voices[1].id)
    if voice == 1:
        engine.setProperty('voice', voices[0].id)

    if voice == 2:
        engine.setProperty('voice', voices[1].id)

    speak("Hello this is Jarvis")

def time():
    Time = datetime.datetime.now().strftime("%I:%M:%S") # Jam = %I, Menit = %M, dan Detik = %S
    speak("The current time is: ")
    speak(Time)

def date():
    year = int(datetime.datetime.now().year)
    month = int(datetime.datetime.now().month)
    date = int(datetime.datetime.now().day)
    speak("The current date is: ")
    speak(date)
    speak(month)
    speak(year)

def greeting():
    hour = datetime.datetime.now().hour
    if hour >= 6 and hour < 12:
        speak("Good Morning master")
    elif hour >= 12 and hour < 18:
        speak("Good afternoon master")
    elif hour >= 18 and hour < 24:
        speak("Good evening master")
    else:
        speak("Good noght master")


def wishme():
    speak("Welcome back master!!!")
    time()
    date()
    greeting()
    speak("How could I help you sir?")

# while True:
#     voice = int(input("Tekan 1 untuk cowok\nTekan 2 untuk cewek\n"))
#      speak(audio)
#     getvoices(voice)
#wishme()


def takeCommandCMD():
    query =  input("Apa yang bisa saya bantu?\n")
    return query

if __name__ == "__main__":
    wishme()
    while True:
        query = takeCommandCMD().lower()
        if 'time' in query:
            time()

        elif 'date' in query:
            date()