import pyttsx3
import datetime
import speech_recognition as sr

engine = pyttsx3.init()


def speak(audio):
    engine.say(audio)
    engine.runAndWait() 

speak("This is New Jarvis assistant")

def time():
    Time = datetime.datetime.now().strftime("%I:%M:%S")
    speak(Time)


def date():
    year = int(datetime.datetime.now().year)
    month = int(datetime.datetime.now().month)
    date = int(datetime.datetime.now().day)
    speak(date)
    speak(month)
    speak(year)


def wishme():
    speak("Welcome back master")
    speak("The current time is")
    time()
    speak("The date is")
    date()

    hour = datetime.datetime.now().hour
    if hour >= 6 and hour < 12:
        speak("Good Morning")
    elif hour >= 12 and hour <18:
        speak("Good afternoon")
    elif hour >= 18 and hour <24:
        speak("Good evening")
    else:
        speak("Good Night")

    speak("Jarvis as your service, how could I help you?")

def takeCommand():
    r = sr.Recognizer()
    with sr.Microphone() as source:
        print("Mendengarkan...")
        r.pause_threshold = 1
        audio = r.listen(source)

    try:
        print("Mengenali...")
        query = r.recognize_google(audio, language='en-US')
        print(query)

    except Exception as e:
        print(e)
        speak("What have you said? Repeat it please")
        return "None"


    return query

takeCommand()