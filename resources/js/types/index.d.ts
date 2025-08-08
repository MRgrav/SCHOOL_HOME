import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

/**
 * Registraion interface
 * Only few keys are here
 */
export interface Registration {
    id: number;
    applicant_name: string;
    admission_sought_for_class: string;
    father_phone: string;
    created_at: Date;
    gender: string;
}

/**
 * Registraion interface
 * Only few keys are here
 */
export interface Notification {
    id: number;
    title: string;
    message: string;
    created_at: Date;
}

export interface Role {
  id: number;
  name: string;
  display_name?: string | null;
  description?: string | null;
  created_at?: string;
  updated_at?: string;
}

export interface Profile {
  id: number;
  name: string;
  image: string | null;
  role_id?: number | null;
  role?: Role | null;
  position?: string | null;
  department?: string | null;
  detail?: string | null;
  message?: string | null;
  created_at?: string;
  updated_at?: string;
}

export interface Department {
  id: number;
  name: string;
  display_name?: string | null;
  description?: string | null;
  created_at?: string;
  updated_at?: string;
}

export type BreadcrumbItemType = BreadcrumbItem;
