"""
Author: Gaspard Baye
Github: bayegaspard
"""
import Factory
 
def main():
    """Main function"""
    factory = Factory.read_factory()
    factory.viewGrades()

if __name__ == "main":
    main()