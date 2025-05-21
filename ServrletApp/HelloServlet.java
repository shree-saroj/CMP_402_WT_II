// use this to compile javac -cp /opt/tomcat/lib/servlet-api.jar WEB-INF/classes/HelloServlet.java -d .
// then copy the class to the /opt/tomcat/webapps/ROOT/WEB-INF/classes directory
import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;


public class HelloServlet extends HttpServlet {
    public void doPost(HttpServletRequest request, HttpServletResponse response)
      throws ServletException, IOException {
        response.setContentType("text/plain");
        String name = request.getParameter("name");
        PrintWriter out = response.getWriter();
        out.println("Hello from Servlet, " + name + "!");
    }
}
