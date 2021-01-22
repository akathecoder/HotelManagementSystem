# Hotel Management System

Created by  [Sparsh Agarwal](https://github.com/sparshagarwal25 "Sparsh Agarwal"), [Raghav Goyal](https://github.com/RaghavGoyal12301 "Raghav Goyal"), [Vineet Sharma](https://github.com/vineet2411sharma "Vineet Sharma"), [Priya Kaushik](https://github.com/priyak281 "Priya Kaushik")

[GitHub Link](https://github.com/sparshagarwal25/HotelManagementSystem "Hotel Management System")

## Installation Instructions

### Prerequisites

- JDK 1.8 + Java 13 installed (if not follow this [instruction](https://docs.oracle.com/en/java/javase/13/install/installation-jdk-microsoft-windows-platforms.html#GUID-A7E27B90-A28D-4237-9383-A58B416071CA))
- Apache NetBeans 11.3 (download from this [link](https://netbeans.apache.org/download/index.html))



### Steps

Now that we have all the above things resolved we can import our Project.

1. Extract the Project Folder.
2. Open NetBeans.
3. Go to Services Tab and open Databases tab.
4. Right Click on Java DB option and select Properties.
5. In the Java DB installation select the derby.jar file from the Libraries Folder.
6. Now in the Database location option select the path where you want to save the database.
7. Select OK.
8. Now right click on Java DB and select create a New Database.
9. Name the Database as "HMSdb", Username as "user01", Password as "pass01".
10. Click OK.
11. You can now see a new Database created.
12. Go to the above selected path and replace the HMSdb folder with the HMSdb folder provided in the Database folder in the Project Folder.
13. Now go to Projects tab.
14. Click on File Tab in Toolbar and select open project.
15. Select the location of HotelManagementSystem Folder in the Project Folder and select OK.
16. Now you can see a new Project opened in the Projects Tab.
17. Now Right click on the Libraries option in the Project Folder and select "Add JAR/Folder".
18. Now select all the files in the Libraries Folder provided in the Project Folder.
19. Now open the DBConnect.java file in package named OTHER.
20. In the Java file confirm the url, user and password (line 30, 31 and 32 respectively) with the details filled when creating Database.
21. Now open MailSender.java file and enter the email id and password of the gmail account you want to use to send the mails.
22. Now go to this [link](https://www.google.com/settings/security/lesssecureapps) and turn "Allow less secure apps" option ON (Use the same Gmail Id as above).
23. Click on Build and Clean option in toolbar.
24. Now you can run the project from toolbar.

Enjoy ;-)
