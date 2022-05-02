"""
Author: Gaspard Baye
Github: bayegaspard
"""

from abc import abstractmethod
from SecureContext import SecureChecks

import emoji

class ViewGrades():
    """Badic representation of view grades"""
    @abstractmethod
    def viewGrades():
        """view grades method"""

class ViewGradesNotLoggedInFactory(ViewGrades):
    """
    Factory that represent the way grades can be viewed.
    The factory does not maintain any of the instances it creates.
    """
    def viewGrades(self):
        """Returns a new student grades instance"""
        print("Requires authentication !!")

class ViewGradesStudentFactory(ViewGrades):
    """
    Factory that represent the way grades can be viewed.
    The factory does not maintain any of the instances it creates.
    """
    def viewGrades(self):
        """Returns a new student grades instance"""
        print("student grades !!")
class ViewGradesFacultyFactory(ViewGrades):
    """
    Factory that represent the way grades can be viewed.
    The factory does not maintain any of the instances it creates.
    """
    def viewGrades(self):
        """Returns a new faculty grades instance"""
        print("Grades for faculty")

class ViewGradesAdminFactory(ViewGrades):
    """
    Factory that represent the way grades can be viewed.
    The factory does not maintain any of the instances it creates.
    """
    def viewGrades(self):
        """Returns a new admin grades instance"""
        print("Admin has no priviledge to view grades")

def read_factory():
    """Constructs an viewGrades factory based on the user's credentials."""
    # Note : We are focusing only on secure strategy factory, 
    # We can also validate user input but it is already done in previous implementations
    
    factories = {
        "notLoggedIn" : ViewGradesNotLoggedInFactory(),
        "student" : ViewGradesStudentFactory(),
        "faculty" : ViewGradesFacultyFactory(),
        "admin" : ViewGradesAdminFactory()
    }
    whitelist = ["admin", "student","faculty"]
    while True:
        Creds = input("input credentials (username:password) :")
        Creds = Creds.split(":")
        print(Creds)
        user = SecureChecks.secureChecks(Creds)
        if user in factories:
            if str(user) in whitelist:
                print(emoji.emojize("All security checks passed :check_mark_button: ! SUCCESS !"))
            else:
                print(emoji.emojize("Security checks failed! :cross_mark:"))
            return factories[user]
        print(f"Unknown user: {user}.")

