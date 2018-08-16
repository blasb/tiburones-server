package app;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.UnsupportedEncodingException;
import java.net.MalformedURLException;
import java.net.URL;
import java.net.URLConnection;
import java.net.URLEncoder;

public class PeticionPost {
	
	private URL url;
	String data;
	
	public PeticionPost(String url) throws MalformedURLException {
		this.url = new URL(url);
		data="";
	}
	
	public void add(String atributoName, String valor) throws UnsupportedEncodingException{
		if(data.length()>0) {
			data+= "&" + URLEncoder.encode(atributoName, "UTF-8") + "=" + URLEncoder.encode(valor, "UTF-8");
		}else {
			data+= URLEncoder.encode(atributoName, "UTF-8")+ "=" +URLEncoder.encode(valor, "UTF-8");
		}
	}
	
	public String getRespuesta() throws IOException{
		String respuesta = "";
		//abrimos conexión
		URLConnection conn = url.openConnection();
		//Especificamos que vamos a escribir
		//setDoOutput(true) se utiliza para POST y PUT . Si es false entonces es para usar las solicitudes GET
		conn.setDoOutput(true);
		//obtenemos el flujo de escritura
		OutputStreamWriter wr = new OutputStreamWriter(conn.getOutputStream());
		//escribimos
		wr.write(data);
		//cerramos la conexión
		wr.close();
		//obtenemos el flujo de lectura
		//me. pensar conn.getOutputStream() y  conn.getInputStream como archivos
		BufferedReader rd = new BufferedReader (new InputStreamReader(conn.getInputStream()));
		String linea;
		//procesamos la salida
		while((linea = rd.readLine()) != null) {
			respuesta += linea;
		}
		return respuesta;
	}
	
}


