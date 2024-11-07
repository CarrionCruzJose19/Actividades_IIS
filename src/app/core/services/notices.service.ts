import { Injectable } from '@angular/core';
import { HttpClient, HttpParams} from '@angular/common/http';
import { Observable } from 'rxjs';
import { enviroment } from '../../enviroments/enviro/enviroment';
import { Notice } from '../../core/model/notice'; 
import { InitParams } from '../../core/model/init-params'; 

@Injectable({
  providedIn: 'root'
})
export class NoticesService {


  constructor(private httpClient: HttpClient) { }

  // Método para obtener todas las noticias
  public getAllNotices(initParams: InitParams): Observable<Notice[]> {
    const query: HttpParams = this.getQueryParamsAsString(initParams);// Hacemos una solicitud GET para obtener las noticias
    const uri = `${enviroment.apiUrl}${enviroment.NOTICES_PATH}`;
    return this.httpClient.get<Notice[]>(uri,{params:query});
  }

  private getQueryParamsAsString(params:any): HttpParams{
    let httpParams = new HttpParams();
    Object.keys(params).forEach(key=>{
      if(params[key] !== undefined && params[key] !==null){
        httpParams = httpParams.append(key, params[key]);
      }
    });
    return httpParams;
  }
}
