import tkinter as tk
from PIL import Image, ImageTk, ImageDraw

window = tk.Tk()

img = Image.new(mode="1", size=(500, 500), color=255)
tkimage = ImageTk.PhotoImage(img)
canvas = tk.Label(window, image=tkimage)
canvas.pack()

draw = ImageDraw.Draw(img)

last_point = (0, 0)

def draw_image(event):
    global last_point, tkimage
    current_point = (event.x, event.y)
    draw.line([last_point, current_point], fill=0, width=5)
    last_point = current_point
    tkimage = ImageTk.PhotoImage(img)
    canvas['image'] = tkimage
    canvas.pack()

def start_draw(event):
    global last_point
    last_point = (event.x, event.y)

def reset_canvas(event):
    global tkimage, img, draw
    img = Image.new(mode="1", size=(500, 500), color=255)
    draw = ImageDraw.Draw(img)
    tkimage = ImageTk.PhotoImage(img)
    canvas['image'] = tkimage
    canvas.pack()

window.bind("<B1-Motion>", draw_image)
window.bind("<ButtonPress-1>", start_draw)
window.bind("<ButtonPress-3>", reset_canvas)
window.mainloop()