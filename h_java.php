<?
$p_title = 'HOWTO - Java';
include 'p_begin.php';
?>


<div class="object">
<div class="name">Assert</div>
<pre>
assert podmínka [ : výraz mající hodnotu ];

generuje: java.lang.AssertionError
kompilace: javac -source 1.4
spuštění: java -ea
</pre>
</div>


<div class="object">
<div class="name">Parametry programu</div>
<pre>
java -Dkey=value program

String tmp = System.getProperty("key");
</pre>
</div>


<div class="object">
<div class="name">Vyvolání garbage collectoru</div>
<pre>
System.gc();
</pre>
</div>


<div class="object">
<div class="name">Javadoc</div>
<pre>
javadoc -breakiterator                       // doporučeno
        -d projekt\doc                       // výstup
        [ -overview overview.html ]          // overview
        [ -public | -protected | -private ]  // rozsah
        -sourcepath projekt\src              // cesta ke zdrojům
        [ balik1 balik2 ... ]                // balíčky
        [ -subpackages                       // probírat strom
        balik3 balik4 ... ]                  // kořenové balíčky
</pre>
</div>


<div class="object">
<div class="name">Tomcat</div>
<pre>
# Kompilace
# ~/.bashrc
export CLASSPATH='/opt/jdk/lib:/usr/share/tomcat4/common/lib/servlet.jar'


# Instalace, Tomcat 4.1, v Debianu standardně
synaptic, hledat tomcat

# /etc/init.d/tomcat4 - nastavit správnou cenu k JDK
JDK_DIRS="/opt/jdk + to co tam bylo"


# Zprovoznění administračního rozhraní
# /var/lib/tomcat4/conf/tomcat-users.xml

&lt;role rolename="admin"/&gt;
&lt;role rolename="manager"/&gt;
&lt;user username="admin" password="secret" roles="admin,manager"/&gt;


# Změna http portu na standardní
# /etc/tomcat4/server.xml

&lt;Connector className="org.apache.coyote.tomcat4.CoyoteConnector"
	port="80" minProcessors="5" maxProcessors="75"
	enableLookups="true" acceptCount="10" debug="0"
	connectionTimeout="20000" useURIValidationHack="false" /&gt;


# Nastavení SSL - http://localhost/tomcat-docs/ssl-howto.html
# Vygenerování klíče

keytool -genkey -alias tomcat -keyalg RSA -keystore /usr/share/tomcat4/.keystore

# /etc/tomcat4/server.xml

&lt;Connector className="org.apache.catalina.connector.http.HttpConnector"
	port="8443" minProcessors="5" maxProcessors="75"
	enableLookups="true"
	acceptCount="10" debug="0" scheme="https" secure="true"&gt;
	&lt;Factory className="org.apache.catalina.net.SSLServerSocketFactory"
		clientAuth="false" protocol="TLS" keystorePass="heslo"/&gt;
&lt;/Connector&gt;


# Přidání nové aplikace (webové rozhraní manageru to nikdy neuložilo (???))
/var/lib/tomcat4/webapps

&lt;Context path="/curna" docBase="/usr/share/tomcat4/server/webapps/curna"
	debug="0" privileged="true" allowLinking="true"&gt;

	&lt;!-- make symlinks work in Tomcat 4.1 --&gt;
	&lt;Resources className="org.apache.naming.resources.FileDirContext"
		allowLinking="true" /&gt;

	&lt;!-- Uncomment this Valve to limit access to localhost
	for obvious security reasons. Allow may be a comma-separated list of
	hosts (or even regular expressions).
	&lt;Valve className="org.apache.catalina.valves.RemoteAddrValve"
		allow="127.0.0.1"/&gt;
	--&gt;

	&lt;Logger className="org.apache.catalina.logger.FileLogger"
		prefix="localhost_curna_" suffix=".log" timestamp="true"/&gt;

&lt;/Context&gt;


# Zprovoznění servletů, aby byly dostupné na adrese
# http://localhost:8080/curna/servlet/jmeno_servletu
# /home/woq/bakalarka/curna/WEB-INF/web.xml

&lt;servlet-mapping&gt;
	&lt;servlet-name>invoker&lt;/servlet-name&gt;
	&lt;url-pattern>/servlet/*&lt;/url-pattern&gt;
&lt;/servlet-mapping&gt;


# Automatické reloadování servletů, je tam nějaká periodická
# hodnota, takže to nejni hned při reloadu stránky :-(
# /etc/tomcat4/server.xml

&lt;DefaultContext reloadable="true"/&gt;

&lt;!-- Před tohle --&gt;
&lt;Context path="/tomcat-docs" docBase="tomcat-docs" debug="0"&gt;


# JSP stránka bude moci spouštět RMI příkazy
# /etc/tomcat4/policy.d/90curna.policy

grant codeBase "file:/home/woq/bakalarka/curna/-" {
//	permission java.security.AllPermission;
	permission java.net.SocketPermission "localhost:3232", "connect";
	permission java.net.SocketPermission "localhost:35270", "connect";
	permission java.net.SocketPermission "woq.sh.cvut.cz:3232", "connect";
	permission java.net.SocketPermission "woq.sh.cvut.cz:35270", "connect";
};

# Knížky o JSP a servletech
<?php Blank('http://www.coreservlets.com/');?>

<?php Blank('http://www.moreservlets.com/');?>
</pre>
</div>


<div class="object">
<div class="name">Vytvoření JAR balíčku</div>
<pre>
[woq@woq ~/tmp]$ jar -cvf neco.jar ./cesta/*.class
added manifest
adding: ./cesta/Test.class (in=286) (out=227) (deflated 79%)
[woq@woq ~/tmp]$
</pre>
</div>


<div class="object">
<div class="name">Použití &quot;externích&quot; tříd v JSP</div>
<pre>
# /nekde/curna/WEB-INF/classes/<strong>curna</strong>/Trida.java

package <strong>curna</strong>;
public class Trida
{

}


# /nekde/curna/stranka.jsp

&lt;%@ page language="java" import="<strong>curna.*</strong>" %&gt;
&lt;%
Trida trd = new Trida();
%&gt;
</pre>
</div>


<div class="object">
<div class="name">Vytvoření webové aplikace v Tomcat 5.5</div>
<pre>
Zkopírovat adresář nebo .war archiv do /var/lib/tomcat5.5/webapps
</pre>
</div>


<div class="object">
<div class="name">Získání absolutní diskové cesty relativně k JSP stránce</div>
<pre>
String absPath = config.getServletContext().getRealPath("/WEB-INF/config.txt");
</pre>
</div>


<!--
<div class="object">
<div class="name"></div>
<pre>

</pre>
</div>
-->


<?
include 'p_end.php';
?>
