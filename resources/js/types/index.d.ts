export interface Task {
    id: number;
    title: string;
    is_completed: boolean;
    estimated_minutes: number;
    created_at: string;
    updated_at: string;
    category?: Category;
    assigned_user?: AssignedUser;
}

export interface Category {
    id: number;
    name: string;
}

export interface AssignedUser {
    id: number;
    name: string;
    avatar_url: string;
}
export interface LoggedUser {
    id: number;
    name: string;
    email: string;
    avatar_url: string;
}