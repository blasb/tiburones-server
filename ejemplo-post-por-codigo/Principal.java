package app;

import java.io.IOException;

public class Principal {

	public static void main(String[] args) throws IOException{
		//System.out.println("holamundo");
		PeticionPost pp = new PeticionPost("http://localhost/tiburones-server/ejemplo-post-por-codigo/saludar.php");
		pp.add("usuario", "blas");
		System.out.println(pp.getRespuesta());
	}

}
