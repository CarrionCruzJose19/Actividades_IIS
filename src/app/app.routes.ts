import { Routes } from '@angular/router';
import { NoticesComponent } from './modules/notices/notices.component';

export const routes: Routes = [
    {path: '', redirectTo: 'notices', pathMatch: 'full'},

    {path: 'notices', component: NoticesComponent},
];
