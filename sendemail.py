import smtplib
 
server = smtplib.SMTP('smtp.gmail.com', 587)
server.starttls()
server.login("soundcheckmusicco@gmail.com", "uQQtBN5Ra@Hs%2ZgCPwX")
 
msg = "YOUR MESSAGE!"
server.sendmail("seanwireman@hotmail.com", "seanwireman@gmail.com", msg)
server.quit()