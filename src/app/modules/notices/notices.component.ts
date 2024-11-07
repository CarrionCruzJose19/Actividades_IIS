import { CommonModule } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CodeNameObj } from '../../core/model/code-name-obj';
import { Notice } from '../../core/model/notice';
import { MatTableModule } from '@angular/material/table';
import { NoticesService } from '../../core/services/notices.service'; 

@Component({
  selector: 'app-notices',
  standalone: true,
  imports: [CommonModule, FormsModule, ReactiveFormsModule, MatTableModule],
  templateUrl: './notices.component.html',
  styleUrl: './notices.component.css'
})
export class NoticesComponent {

  filters: CodeNameObj[] = [];
  status: CodeNameObj[] = [];
  notices: Notice[] = [];

  reportForm = new FormGroup({
    type: new FormControl('opt_notice_number'), // Tipo de filtro
    titulo: new FormControl(''),
    resumen: new FormControl(''), // Resumen de la notificación
    fecha: new FormControl(null), // Fecha de la notificación
    imagen: new FormControl(''), // Imagen (se utilizará para la carga de archivos)
    status: new FormControl('active'), // Estado de la notificación
    pagin: new FormControl(1) // Paginación, por ejemplo
  })
  
  ngOnInit() {
    this.notices = [
      { id: 1,titulo: 'Notificación 1', resumen: 'Resumen de la notificación 1', fecha: 'null', imagen: 'hola' },
      { id: 2,  titulo: 'Notificación 2', resumen: 'Resumen de la notificación 2', fecha: 'null', imagen: 'inactive' },
      { id: 3, titulo: 'Notificación 3', resumen: 'Resumen de la notificación 3', fecha: 'null', imagen: 'active' },
    ];
  }
  

}
