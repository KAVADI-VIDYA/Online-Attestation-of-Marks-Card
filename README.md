# Online-Attestation-of-Marks-Card
The main objective of “Online Attestation of Marks Card” is to develop a software which enables the students to get attested their marks card online by uploading the marks card to be attested and then downloading the attested marks card online without  he/she going to the intended authority for his signature and seal on marks card. The Administrator cross checks and verifies the marks card uploaded by the student with details present in the database if it matches then the marks card is being attested by the administrator and is made available for student to download the attested marks card. 

4.3	MODULES EXPLANATION
STUDENT MODULE : 
In this student module, first the student need to login with his username and password ,after logging in into his account he/she can perform with two operations namely, 
-Attestation:
 Here the Student needs to upload the marks card that is to be attested. 
-Download attested marks card:
  Here the Student can download the attested the marks card in the pdf format and can also view if any of his/her marks card has been rejected.
ADMINISTRATOR MODULE:
In this administrator module, first the admin need to login with his username and password ,after logging in into his account he/she can perform with two operations namely, 
-Attest Marks Card:
Admin needs to select the marks card for attestation. After selecting the marks card admin compares the marks card uploaded by the student with the data retrieved from the database for attestation. If the marks card uploaded by the student matches the database he attests the marks card. Once the marks card is attested by the admin, pdf with marks card and qr code is generated and stored in the folder on server. If the marks card uploaded by the student does not matches the database then the admin rejects the marks card and the file is moved to another folder, which can be used later by the student.
-Register Another Amin:
 Here the admin can register new administrator to carry out the attestation of marks card at his absence.

    
HARDWARE AND SOFTWARE REQUIREMENTS  

    SOFTWARE CONFIGURATION : 
•	Platform  : Web application 
•	Server : Xampp Server 
•	Front End : HTML, CSS, PHP 
•	Back End : PHP, myPhpAdmin 
•	Operating system : Windows 7,8,10 
    HARDWARE CONFIGURATION : 
•	PROCESSOR : INTEL CORE I5 
•	RAM  : 4 GB 
•	HARD DISK : 1TB
