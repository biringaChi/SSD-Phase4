

from abc import abstractmethod
from SecureContext import *

import emoji

class UploadGrades():
    """Badic representation of upload grades"""
    @abstractmethod
    def uploadGrades():
        """upload grades abstract method"""

class UploadGradesNotLoggedInFactory(UploadGrades):
    """
    Factory that represent the way grades can be uploaded.
    The factory does not maintain any of the instances it creates.
    """
    def uploadGrades(self):
        """Returns a new student grades instance"""
        print("Requires authentication !!")

class UploadGradesStudentFactory(UploadGrades):
    """
    Factory that represent the way grades can be uploaded.
    The factory does not maintain any of the instances it creates.
    """
    def uploadGrades(self):
        """Returns a new student grades instance"""
        print("student can not upload greads !!")
class UploadGradesFacultyFactory(UploadGrades):
    """
    Factory that represent the way grades can be uploaded.
    The factory does not maintain any of the instances it creates.
    """
    def uploadGrades(self):
        """Returns a new faculty grades instance"""
        print("Upload grads Successfully")

class UploadGradesAdminFactory(UploadGrades):
    """
    Factory that represent the way grades can be uploaded.
    The factory does not maintain any of the instances it creates.
    """
    def uploadGrades(self):
        """Returns a new admin grades instance"""
        print("Admin can not upload grades")

def read_factory():
    """Constructs an uploadGrades factory based on the user's credentials."""
    # Note : We are focusing only on secure strategy factory, 
    # We can also validate user input but it is already done in previous implementations
    
    factories = {
        "notLoggedIn" : UploadGradesNotLoggedInFactory(),
        "student" : UploadGradesStudentFactory(),
        "faculty" : UploadGradesFacultyFactory(),
        "admin" : UploadGradesAdminFactory()
    }
    whitelist = ["admin", "student","faculty"]
    while True:
        Creds = input("input credentials (username:password) :")
        Creds = Creds.split(":")
        user = SecureChecks.secureChecks(Creds) 
        if len(Creds)!=2:
            print("Please input your username and password in this format , username:password")
        else:
            if user in factories:
                if str(user) in whitelist and SecureFileChecks.secureFileChecks()=="valid" and SecureFileSize.securefilesize()=="valid":
                    print(emoji.emojize("All security checks passed :check_mark_button: ! SUCCESS !"))
                else:
                    print(emoji.emojize("Security checks failed! :cross_mark:"))
            return factories[user]
            

        print(f"Unknown user: {user}.")

