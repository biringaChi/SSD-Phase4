
from importlib.resources import path
import emoji
import os
import sys
from pathlib import Path
class CheckCreds():
    """Strategy to check users roles for validation"""
    def do_creds_checks(Creds):
        print(emoji.emojize("performing user credential checks :stopwatch:...."))
        if str(Creds[0])=="admin" and str(Creds[1])=="admin":
            print(emoji.emojize("Welcome admin :man_technologist:"))
            return "admin"
        elif str(Creds[0])=="student" and str(Creds[1])=="student":
            print(emoji.emojize("Welcome student :man_student:"))
            return "student"
        elif str(Creds[0])=="faculty" and str(Creds[1])=="faculty":
            print(emoji.emojize("Welcome faculty :teacher:"))
            return "faculty"
        else:
            print(emoji.emojize("Please use a valid credential :thinking_face:"))
            return "notLoggedIn"

class CheckRoles():
    """Strategy to check users roles for validation"""
    def do_check_roles(user):
        "Method to check roles"
        print(emoji.emojize(f"Checking role  :stopwatch:......"))
        if str(user) == "admin":
            return "admin"
        elif str(user) == "student":
            return "student"
        elif str(user)=="faculty":
            return "faculty"
        else:
            return "Not a valid user !"

class CheckFileSize():
    """Strategy to check file size """
    def do_check_size():
        file_path = input(r"please specify file path in the format (C:\\Users\\chith\\Desktop\\data.csv):")
        #print(file_path)
        size = os.stat("C:\\Users\\chith\\Desktop\\data.csv").st_size
        #print(os.stat("C:\\Users\\chith\\Desktop\\data.csv").st_size)
        if size < 5000: # 5kb
            return "valid"
        else:
            return "FileSizeExceeded"
#print(CheckFileSize.do_check_size())
class CheckFileExtension():
    """Strategy to check file Extension"""
    def do_check_extension():
        file_path = input(r"please specify file path in the format (C:\\Users\\chith\\Desktop\\data.csv):")
       # print(file_path)
        ext = os.path.splitext(file_path)[-1].lower()
        if ext == ".csv":
            return "valid"
        else:
            return "InValidFile"
#print(CheckFileExtension.do_check_extension())

