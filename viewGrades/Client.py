"""
Author: Gaspard Baye
Github: bayegaspard
"""
from Factory import read_factory
 
def main():
    """Main function"""
    factory = read_factory()
    factory.viewGrades()

if __name__ == "main":
    main()