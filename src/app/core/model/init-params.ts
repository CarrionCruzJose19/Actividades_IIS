export interface InitParams {
    id: number;
    titulo: string;     // El título de la noticia
    resumen: string;    // El resumen de la noticia
    fecha: string;      // La fecha de la noticia (en formato de cadena de texto, típicamente 'YYYY-MM-DD')
    imagen?: string;    
}

