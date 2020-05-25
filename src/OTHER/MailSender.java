package OTHER;

import java.awt.Graphics2D;
import java.awt.Rectangle;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import java.util.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.mail.*;
import javax.mail.internet.*;
import javax.activation.*;
import javax.imageio.ImageIO;
import javax.mail.Session;
import javax.mail.Transport;
import javax.swing.JComponent;

public class MailSender {

    public static void sendMail(String recipient, String subject, String mail) {
        String host = "smtp.gmail.com";
        final String user = "hotelms4team7@gmail.com";  //Enter Mail ID
        final String password = "nahibataraha"; //Enter Password

        String to = recipient;  //Enter Recipient email ID

        //Get the session object  
        Properties props = new Properties();
        props.put("mail.smtp.starttls.enable", "true");
        props.put("mail.smtp.host", host);
        props.put("mail.smtp.auth", "true");
        props.put("mail.smtp.port", "587");

        Session session;
        session = Session.getDefaultInstance(props,
                new javax.mail.Authenticator() {
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(user, password);
            }
        });

        //Compose the message  
        try {
            MimeMessage message = new MimeMessage(session);
            message.setFrom(new InternetAddress(user));
            message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));
            message.setSubject(subject);
            message.setText(mail);

            //send the message  
            Transport.send(message);

            System.out.println("message sent successfully...");

        } catch (MessagingException e) {
            e.printStackTrace();
        }
    }

    public static void sendMail(String recipient, String subject, JComponent mail) {
        String host = "smtp.gmail.com";
        final String user = "hotelms4team7@gmail.com";  //Enter Mail ID
        final String password = "nahibataraha"; //Enter Password

        String to = recipient;  //Enter Recipient email ID

        //Get the session object  
        Properties props = new Properties();
        props.put("mail.smtp.starttls.enable", "true");
        props.put("mail.smtp.host", host);
        props.put("mail.smtp.auth", "true");
        props.put("mail.smtp.port", "587");

        Session session;
        session = Session.getDefaultInstance(props,
                new javax.mail.Authenticator() {
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication(user, password);
            }
        });

        //Compose the message  
        try {
            MimeMessage message = new MimeMessage(session);
            message.setFrom(new InternetAddress(user));
            message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));
            message.setSubject(subject);
//            message.setText("Here is your Bill : \n");

            // This mail has 2 part, the BODY and the embedded image
            MimeMultipart multipart = new MimeMultipart("related");

            // first part (the html)
            BodyPart messageBodyPart = new MimeBodyPart();
            String htmlText = "<H2>Here is your bill : </H2>"
                    + "<img src=\"cid:image\">"
                    + "<H4>We hope you had a good stay.</H4>"
                    + "<H4>HotelMS</H4>"
                    + "<H4></H4>";

            messageBodyPart.setContent(htmlText, "text/html");
            // add it
            multipart.addBodyPart(messageBodyPart);

            // second part (the image)
            String address = "fileJPG.jpg";

            messageBodyPart = new MimeBodyPart();

            BufferedImage image = getImage(mail);

            ImageIO.write(image, "jpg", new File(address));

            DataSource fds = new FileDataSource(address);
            messageBodyPart.setDataHandler(new DataHandler(fds));
            messageBodyPart.setHeader("Content-ID", "<image>");

            // add image to the multipart
            multipart.addBodyPart(messageBodyPart);

            // put everything together
            message.setContent(multipart);

            //send the message  
            Transport.send(message);

            System.out.println("message sent successfully...");

        } catch (MessagingException e) {
            e.printStackTrace();
        } catch (IOException ex) {
            Logger.getLogger(MailSender.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    private static BufferedImage getImage(JComponent c) {
        Rectangle region = c.getBounds();
        BufferedImage image = new BufferedImage(c.getWidth(), c.getHeight(), BufferedImage.TYPE_INT_RGB);
        Graphics2D g2d = image.createGraphics();
//        g2d.translate(region.x, region.y);
        g2d.setColor(c.getBackground());
        g2d.fillRect(region.x, region.y, region.width, region.height);
        c.paint(g2d);
        g2d.dispose();
        return image;
    }

}
