/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     21/09/2017 7:25:23                           */
/*==============================================================*/


drop table if exists anexos;

drop table if exists asistencia;

drop table if exists contenido;

drop table if exists cursos;

drop table if exists docente;

drop table if exists empresa;

drop table if exists estado_inscripcion;

drop table if exists grupos;

drop table if exists informe_final;

drop table if exists inscripcion;

drop table if exists notas;

drop table if exists objetivos_especificos;

drop table if exists participante;

drop table if exists planificacion;

drop table if exists temario;

drop table if exists tipo_capacitacion;

drop table if exists tipo_evento;

/*==============================================================*/
/* Table: anexos                                                */
/*==============================================================*/
create table anexos
(
   ane_codigo           int(10) not null auto_increment,
   pla_codigo           int(10),
   ane_nombre           varchar(60) not null,
   primary key (ane_codigo)
);

/*==============================================================*/
/* Table: asistencia                                            */
/*==============================================================*/
create table asistencia
(
   asi_codigo           int(10) not null auto_increment,
   ins_codigo           int(10),
   cur_codigo           int(10),
   asi_porcentaje       decimal(10,2) not null,
   asi_observacion      varchar(45) not null,
   primary key (asi_codigo)
);

/*==============================================================*/
/* Table: contenido                                             */
/*==============================================================*/
create table contenido
(
   con_codigo           int(10) not null auto_increment,
   tem_codigo           int(10),
   con_nombre           varchar(100) not null,
   con_fecha            date,
   con_valor_hora_clase decimal(10,2),
   con_horas_dictadas   decimal(10,2),
   con_horas_act_docente decimal(10,2),
   con_horas_totales_docente decimal(10,2),
   con_valor_pagar      decimal(10,2),
   con_valor_total      decimal(10,2),
   primary key (con_codigo)
);

/*==============================================================*/
/* Table: cursos                                                */
/*==============================================================*/
create table cursos
(
   cur_codigo           int(10) not null auto_increment,
   pla_codigo           int(10),
   cur_nombre           varchar(100) not null,
   cur_descripcion      text,
   cur_fecha_planificacion date,
   cur_codigo_curso     varchar(45),
   cur_objetivo         text,
   cur_duracion         varchar(45),
   cur_dirigido         varchar(100),
   cur_participantes    int,
   cur_costo            decimal(10,2),
   cur_fecha_inscripcion date,
   cur_nota_aprob       decimal(10,2),
   cur_asistencia_aprob varchar(45),
   cur_observaciones    text,
   cur_estado           bool,
   cur_firma_realiza    varchar(45),
   cur_pie_firma        varchar(45),
   cur_creado_por       varchar(45),
   cur_fecha_creacion   date,
   cur_modificado_por   varchar(45),
   cur_fecha_modificacion date,
   primary key (cur_codigo)
);

/*==============================================================*/
/* Table: docente                                               */
/*==============================================================*/
create table docente
(
   doc_codigo           int(10) not null auto_increment,
   doc_cedula           char(10) not null,
   doc_nombre           varchar(60) not null,
   doc_apellido         varchar(60) not null,
   doc_siglas           varchar(5) not null,
   doc_titulo           varchar(45) not null,
   doc_correo           varchar(100) not null,
   doc_telefono         varchar(15) not null,
   primary key (doc_codigo)
);

/*==============================================================*/
/* Table: empresa                                               */
/*==============================================================*/
create table empresa
(
   emp_codigo           int(10) not null auto_increment,
   emp_nombre           varchar(100) not null,
   emp_unidad           varchar(100) not null,
   emp_firma_jefe       varchar(100) not null,
   emp_pie_jefe         varchar(100) not null,
   emp_firma_docente    varchar(100) not null,
   emp_pie_docente      varchar(100) not null,
   emp_firma_director_espel varchar(100) not null,
   emp_pie_director_espel varchar(100) not null,
   emp_pie2_director_espel varchar(100) not null,
   emp_firma_aux        varchar(100) not null,
   emp_pie_aux          varchar(100) not null,
   primary key (emp_codigo)
);

/*==============================================================*/
/* Table: estado_inscripcion                                    */
/*==============================================================*/
create table estado_inscripcion
(
   ein_codigo           int(10) not null auto_increment,
   ein_nombre           varchar(45) not null,
   ein_estado           bool not null,
   primary key (ein_codigo)
);

/*==============================================================*/
/* Table: grupos                                                */
/*==============================================================*/
create table grupos
(
   gru_codigo           int(10) not null auto_increment,
   cur_codigo           int(10),
   gru_nombre           varchar(45) not null,
   gru_horario          varchar(45) not null,
   primary key (gru_codigo)
);

/*==============================================================*/
/* Table: informe_final                                         */
/*==============================================================*/
create table informe_final
(
   inf_codigo           int(10) not null auto_increment,
   cur_codigo           int(10),
   tem_codigo           int(10),
   doc_codigo           int(10),
   inf_nombre           varchar(100),
   inf_fecha_entrega    date,
   inf_num_asistentes   int,
   inf_num_inscritos    int,
   inf_num_retirados    int,
   inf_num_aprobados    int,
   inf_promedio_asistencia decimal(10,2),
   inf_promedio_calificacion decimal(10,2),
   inf_desarrollo       text,
   inf_logros           text,
   inf_conclusiones     text,
   inf_recomendaciones  text,
   primary key (inf_codigo)
);

/*==============================================================*/
/* Table: inscripcion                                           */
/*==============================================================*/
create table inscripcion
(
   ins_codigo           int(10) not null auto_increment,
   cur_codigo           int(10),
   ein_codigo           int(10),
   par_codigo           int(10),
   gru_codigo           int(10),
   ins_fecha_inscripcion date,
   ins_factura_pago     varchar(45),
   ins_pago_inscripcion decimal(10,2),
   ins_fecha_pago_inscripcion date,
   ins_pago_auditoria   varchar(45),
   ins_pago_valor       decimal(10,2),
   primary key (ins_codigo)
);

/*==============================================================*/
/* Table: notas                                                 */
/*==============================================================*/
create table notas
(
   not_codigo           int(10) not null auto_increment,
   cur_codigo           int(10),
   ins_codigo           int(10),
   not_nota1            decimal(10,2) not null,
   not_nota2            decimal(10,2) not null,
   not_final            decimal(10,2) not null,
   not_observacion      varchar(45),
   primary key (not_codigo)
);

/*==============================================================*/
/* Table: objetivos_especificos                                 */
/*==============================================================*/
create table objetivos_especificos
(
   obj_codigo           int(10) not null auto_increment,
   pla_codigo           int(10),
   obj_especifico       varchar(100) not null,
   primary key (obj_codigo)
);

/*==============================================================*/
/* Table: participante                                          */
/*==============================================================*/
create table participante
(
   par_codigo           int(10) not null auto_increment,
   par_nombre_participante varchar(60) not null,
   par_apellido_participante varchar(60) not null,
   par_cedula_participante char(10) not null,
   par_tipo_participante varchar(45) not null,
   par_correo_participante varchar(100) not null,
   par_celular          varchar(15) not null,
   par_convencional     varchar(15) not null,
   par_domicilio        varchar(100) not null,
   par_fecha_inscripcion date not null,
   par_nombre_repre     varchar(60) not null,
   par_apellido_repre   varchar(60) not null,
   par_cedula_repre     char(10) not null,
   primary key (par_codigo)
);

/*==============================================================*/
/* Table: planificacion                                         */
/*==============================================================*/
create table planificacion
(
   pla_codigo           int(10) not null auto_increment,
   tca_codigo           int(10),
   tev_codigo           int(10),
   pla_programa         text not null,
   pla_nombre           varchar(100) not null,
   pla_fecha_inicio     date not null,
   pla_fecha_fin        date not null,
   pla_lugar            varchar(100) not null,
   pla_curso_codigo     varchar(45) not null,
   pla_antecedentes     text not null,
   pla_objetivo         varchar(100) not null,
   pla_metodologia      text not null,
   pla_presupuesto      decimal(10,2) not null,
   pla_disposiciones    text not null,
   pla_firma_supervisado varchar(100) not null,
   pla_pie_supervisado  varchar(100) not null,
   pla_fecha            date not null,
   pla_creado_por       varchar(45),
   pla_fecha_creacion   date,
   pla_modificado_por   varchar(45),
   pla_fecha_modificacion date,
   primary key (pla_codigo)
);

/*==============================================================*/
/* Table: temario                                               */
/*==============================================================*/
create table temario
(
   tem_codigo           int(10) not null auto_increment,
   pla_codigo           int(10),
   doc_codigo           int(10),
   tem_nombre           varchar(100) not null,
   tem_fecha_inicio     date,
   tem_fecha_fin        date,
   primary key (tem_codigo)
);

/*==============================================================*/
/* Table: tipo_capacitacion                                     */
/*==============================================================*/
create table tipo_capacitacion
(
   tca_codigo           int(10) not null auto_increment,
   tca_nombre           varchar(45) not null,
   tca_estado           bool not null,
   primary key (tca_codigo)
);

/*==============================================================*/
/* Table: tipo_evento                                           */
/*==============================================================*/
create table tipo_evento
(
   tev_codigo           int(10) not null auto_increment,
   tev_nombre           varchar(45) not null,
   tev_estado           bool not null,
   primary key (tev_codigo)
);

alter table anexos add constraint fk_relationship_18 foreign key (pla_codigo)
      references planificacion (pla_codigo) on delete restrict on update restrict;

alter table asistencia add constraint fk_relationship_21 foreign key (ins_codigo)
      references inscripcion (ins_codigo) on delete restrict on update restrict;

alter table asistencia add constraint fk_relationship_22 foreign key (cur_codigo)
      references cursos (cur_codigo) on delete restrict on update restrict;

alter table contenido add constraint fk_relationship_29 foreign key (tem_codigo)
      references temario (tem_codigo) on delete restrict on update restrict;

alter table cursos add constraint fk_relationship_17 foreign key (pla_codigo)
      references planificacion (pla_codigo) on delete restrict on update restrict;

alter table grupos add constraint fk_relationship_2 foreign key (cur_codigo)
      references cursos (cur_codigo) on delete restrict on update restrict;

alter table informe_final add constraint fk_relationship_23 foreign key (cur_codigo)
      references cursos (cur_codigo) on delete restrict on update restrict;

alter table informe_final add constraint fk_relationship_30 foreign key (tem_codigo)
      references temario (tem_codigo) on delete restrict on update restrict;

alter table informe_final add constraint fk_relationship_31 foreign key (doc_codigo)
      references docente (doc_codigo) on delete restrict on update restrict;

alter table inscripcion add constraint fk_relationship_11 foreign key (par_codigo)
      references participante (par_codigo) on delete restrict on update restrict;

alter table inscripcion add constraint fk_relationship_20 foreign key (cur_codigo)
      references cursos (cur_codigo) on delete restrict on update restrict;

alter table inscripcion add constraint fk_relationship_24 foreign key (ein_codigo)
      references estado_inscripcion (ein_codigo) on delete restrict on update restrict;

alter table inscripcion add constraint fk_relationship_25 foreign key (gru_codigo)
      references grupos (gru_codigo) on delete restrict on update restrict;

alter table notas add constraint fk_relationship_12 foreign key (cur_codigo)
      references cursos (cur_codigo) on delete restrict on update restrict;

alter table notas add constraint fk_relationship_13 foreign key (ins_codigo)
      references inscripcion (ins_codigo) on delete restrict on update restrict;

alter table objetivos_especificos add constraint fk_relationship_19 foreign key (pla_codigo)
      references planificacion (pla_codigo) on delete restrict on update restrict;

alter table planificacion add constraint fk_relationship_26 foreign key (tev_codigo)
      references tipo_evento (tev_codigo) on delete restrict on update restrict;

alter table planificacion add constraint fk_relationship_27 foreign key (tca_codigo)
      references tipo_capacitacion (tca_codigo) on delete restrict on update restrict;

alter table temario add constraint fk_relationship_16 foreign key (pla_codigo)
      references planificacion (pla_codigo) on delete restrict on update restrict;

alter table temario add constraint fk_relationship_28 foreign key (doc_codigo)
      references docente (doc_codigo) on delete restrict on update restrict;

